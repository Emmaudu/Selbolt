import React from 'react'
import User from './User'
import Input from './Input'
import ReactDOM from 'react-dom';
import axios from 'axios'
import CurrentReceiverContext from './CurrentReceiverContext';
import UserContext from './UserContext';
import Chatbox from './Chatbox';
import { useEffect, useState} from 'react';
import Centrifuge from 'centrifuge'


// get details of auth user
// get receivers receiving that user message
// fetch message of between the receiver and the sender

function Sidebar() {

    const [receivers, setreceivers] = useState([]);
    const [currentReceiver, setCurrentReceiver] = useState(null);
    const [chat, setChat] = useState(false);
    const [chatboxMessages, setChatboxMessages] = useState(false);
    const [user, setUser] = useState(null);
    const [token, setToken] = useState(null);

    //connection to centrifugo
    var centrifuge = new Centrifuge('ws://localhost:8000/connection/websocket');

    //fetch message from backend based on the user that is been click
    const fetchMessage = (receiver) => {
        axios.get('/messages/'+receiver.custom_id)
        .then(function(response){
            console.log(response.data.messages);
            setChatboxMessages(response.data.messages);
            setCurrentReceiver(receiver);
            setChat(true);

        }).catch(function(error){
           // console.log(message);
            console.log(error);
        })
    }

    useEffect(() => {
        // fetch receivers
        const fetchData = () => {
            axios.get('/receivers')
            .then(function(response){
                console.log(response.data);
                setreceivers(response.data.receivers);
                
                //subscribe user to receivers channel
                centrifuge.setToken(response.data.token);
                var channels = response.data.channels;

                centrifuge.on("disconnect", function (ctx) {
                    console.log("disconnected", ctx);
                });
                centrifuge.on('connect', function(ctx) {
                    console.log("hello");
                    // subscribe to channel
                    centrifuge.subscribe("common-room", function(message) {
                        
                        channels.map(
                            (channel) => (
                                centrifuge.subscribe(channel.channel, function(ctx) {
                                    // handle new message coming from channel "news"
                                    console.log(receiver.channel);
                                })
                            )
                        ) 
                    });
                });
                centrifuge.connect();
            })
        }

        // fetch details of authenticated user
        const User = () => {
            axios.get('/user')
            .then(function(response){
                console.log(response.data);
                setUser(response.data.user);
                setToken(response.data.token);

            })
        }

        User();

        fetchData();
    }, []);
    

    return (
        <>
        <CurrentReceiverContext.Provider value={{currentReceiver}}>
            <UserContext.Provider value={{user, token}} >
                <div>
                    <div id="plist" className="people-list">
                        
                    <Input />
                    {receivers.map(
                        (receiver) => (<User key={receiver.custom_id} onClick={() => fetchMessage(receiver)} {...receiver}/>)
                    )}
                    </div>

                    {chat && <Chatbox chatboxMessage={chatboxMessages} />}

                </div>
            </UserContext.Provider>
        </CurrentReceiverContext.Provider>
        </>
    )
}


export default Sidebar


if (document.getElementById('chat-app')) {

    ReactDOM.render(<Sidebar />, document.getElementById('chat-app'));
}
