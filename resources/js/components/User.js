import React from 'react'

const User = ({first_name, last_name, onClick}) => {

    return (
            <ul onClick={onClick} className="list-unstyled chat-list mt-2 mb-0">
                <li className="clearfix">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar"/>
                    <div className="about">
                        <div className="name">{first_name} {last_name} </div>

                        <div className="status"> <i className="fa fa-circle offline"></i> left 7 mins ago </div>                                            
                    </div>
                </li>
            </ul>
    )
}

export default User
