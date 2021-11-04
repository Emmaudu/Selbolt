import React from 'react'
import SenderMessage from './SenderMessage'
import ReceiverMessage from './ReceiverMessage'
import {useState, useContext } from 'react'
import ReactSummernote from 'react-summernote'
import 'react-summernote/dist/react-summernote.css'
import CurrentReceiverContext from './CurrentReceiverContext'
import UserContext from './UserContext'
import Centrifuge from 'centrifuge'

const Chatbox = ({chatboxMessage}) => {
    const img = "https://media.sketchfab.com/models/bdae7ddf25c04cf082e702620a014c76/thumbnails/79634abe26f74997a06a460c8373e627/1024x576.jpeg";

    const user = useContext(UserContext);
    
    const channel = user.channel;

    const currentReceiver = useContext(CurrentReceiverContext);

    const [content, setContent] = useState(null);
    
    const onChange = (e) =>  {     
        setContent(e);
    }

    //save message
    const sendMessage = () => {
        ReactSummernote.reset();
        axios.post('/send-message', {
            message: content,
            receiver_id: currentReceiver.custom_id,
            channel: channel
        }).then(function(response){
            console.log(response);  
        })
    }

    return (
        <>
        <div className="chat">
            <div className="chat-header clearfix">
                <div className="row">
                    <div className="col-lg-6">
                        <a href="" data-toggle="modal" data-target="#view_info">
                            {currentReceiver.currentReceiver.pic == null ? <img src={img} alt="" /> : <img src={currentReceiver.currentReceiver.pic} alt="" />}
                            
                        </a>
                        <div className="chat-about">
                            <h6 className="m-b-0 receiver_name">{currentReceiver.currentReceiver.first_name} {currentReceiver.currentReceiver.last_name}</h6>
                            <small>online</small>
                        </div>
                    </div>
                </div>
            </div>
            <div className="chat-history">
                <ul className="m-b-0">
                    {chatboxMessage.map(
                        
                        (message) => 
                        {
                            if (message.sender_id == user.user.custom_id) {
                                console.log(user.user.id);
                               return <SenderMessage key={message.id} messages={message} />
                            }else{
                                console.log(user.user.id);
                                return <ReceiverMessage key={message.id} messages={message} />
                            }
                        }
                        
                    )}
                </ul>
            </div>
            <div className="chat-message clearfix">
                <ReactSummernote
                    options={{
                    height: 100,
                    toolbar: [
                        ['insert', ['link',]],
                    ]
                    }}
                    onChange={(e) => onChange(e)}
                />

                <button className="btn btn-success btn-lg btn-block mt-3" onClick={() => content != null && sendMessage()}>Send</button>
            </div>
        </div>
        </>
    )
}

export default Chatbox
