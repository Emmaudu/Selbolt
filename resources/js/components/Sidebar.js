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

    //const [receivers, setreceivers] = useState([]);
    const [currentReceiver, setCurrentReceiver] = useState([]);
    const [channel, setChannel] = useState(false);
    const [chatboxMessages, setChatboxMessages] = useState([]);
    const [user, setUser] = useState(null);
    const [token, setToken] = useState(null);
    const [newMessage, setNewMessage] = useState([]);


    //fetch message from backend based on the user that is been click
    const fetchMessage = () => {
        axios.get('/messages')
        .then(function(response){
            console.log(response.data.messages);
            //setChatboxMessages(response.data.messages);
            //setChat(true);
        }).catch(function(error){
           // console.log(message);
            console.log(error);
        })
    }

    useEffect(() => {
        // // fetch receiver
        const fetchData = () => {
            axios.get('/receiver')
            .then(function(response){
                
                //setreceivers(response.data.receiver);
                setCurrentReceiver(response.data.receiver);
                setChannel(response.data.channel);
                setToken(response.data.token);
                connectToCentrifugo(response.data.channel, response.data.token);
            })
        }

        // fetch details of authenticated user
        const User = () => {
            axios.get('/user')
            .then(function(response){
                //console.log(response.data);
                setUser(response.data.user);
            })
        }

        const connectToCentrifugo = (channel, token) => {
            //connection to centrifugo
            var centrifuge = new Centrifuge('ws://localhost:8000/connection/websocket');
            //subscribe user to receivers channel
            centrifuge.setToken(token);
            console.log(token);
            centrifuge.on('connect', function(ctx) {
                console.log(channel);
                // subscribe to channel
                centrifuge.subscribe(channel, function(ctx) {
                    console.log(ctx.data.messages);
                    //chatboxMessages.push(ctx.data.messages)
                    console.log(chatboxMessages);
                    //setChatboxMessages(chatboxMessages.push(ctx.data.messages));
                    
                    setChatboxMessages(chatboxMessages.concat(ctx.data.messages));
                });

                fetchMessage();
            });

            centrifuge.on("disconnect", function (ctx) {
                console.log("hello", ctx);
            });
            centrifuge.connect();
        }
        User();
        fetchData();
        console.log("hello");
        
    }, [0]);
    
    useEffect(() => {
        
    }, [newMessage])

    return (
        <>
        <CurrentReceiverContext.Provider value={{currentReceiver}}>
            <UserContext.Provider value={{user, token, channel}} >
                <div>

                    <Chatbox chatboxMessage={chatboxMessages} />

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
