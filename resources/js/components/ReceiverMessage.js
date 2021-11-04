import React from 'react'
import parse from 'html-react-parser'
const ReceiverMessage = ({messages}) => {
    // <div className="message-data">
    //             <span className="message-data-time">{messages.created_at}</span>
    //         </div>
    return (
        <li className="clearfix">
            
            <div className="message my-message">{parse(messages.body)}</div>
        </li>
    )
}

export default ReceiverMessage
