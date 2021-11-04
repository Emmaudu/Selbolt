import React from 'react'
import parse from 'html-react-parser'
const SenderMessage = ({messages}) => {
    // <div className="message-data text-right">
    //             <span className="message-data-time">{parse(messages.created_at)}</span>
    //         </div>
    return (
        <li className="clearfix">
            
            <div className="message other-message float-right">{parse(messages.body)}</div>
        </li>
    )
}

export default SenderMessage
