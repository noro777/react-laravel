import { useDispatch, useSelector } from "react-redux";
import { getStateParams } from "../layout/layoutSlice";
import { postContactData, getErrors, getStatus, change } from "./contactSlice";
import { useEffect, useState } from "react";
import { Errors } from "../../includes/layout";


export default function Contact() {
    const params = useSelector(getStateParams)
    const [name, setName] = useState('')
    const [email, setEmail] = useState('')
    const [subject, setSubject] = useState('')
    const [message, setMessage] = useState('')
    const errors = useSelector(getErrors)
    const status = useSelector(getStatus)
    const dispatch = useDispatch()

    useEffect(() => {
        setTimeout(() => {
            dispatch(change())
        }, 5000)
    }, [status, errors])

    return (
        <div className="container-fluid">
            <main className="tm-main">

                <div className="row tm-row tm-mb-120">
                    <div className="col-12">
                        <h2 className="tm-color-primary tm-post-title tm-mb-60">{params.contact}</h2>
                    </div>
                    {status}
                    <div className="col-lg-7 tm-contact-left">
                        <Errors errors={errors} />
                        <div className="form-group row mb-4">
                            <label htmlFor="name"
                                className="col-sm-3 col-form-label text-right tm-color-primary">{params.name}</label>
                            <div className="col-sm-9">
                                <input className="form-control mr-0 ml-auto" name="name" id="name" type="text"
                                    onChange={(e) => setName(e.target.value)}
                                    required />
                            </div>
                        </div>
                        <div className="form-group row mb-4">
                            <label htmlFor="email"
                                className="col-sm-3 col-form-label text-right tm-color-primary">{params.email}</label>
                            <div className="col-sm-9">
                                <input className="form-control mr-0 ml-auto" name="email" id="email" type="email"
                                    onChange={(e) => setEmail(e.target.value)}
                                    required />
                            </div>
                        </div>
                        <div className="form-group row mb-4">
                            <label htmlFor="subject"
                                className="col-sm-3 col-form-label text-right tm-color-primary">{params.Subject}</label>
                            <div className="col-sm-9">
                                <input className="form-control mr-0 ml-auto" name="subject" id="subject" type="text"
                                    onChange={(e) => setSubject(e.target.value)}
                                    required />
                            </div>
                        </div>
                        <div className="form-group row mb-5">
                            <label htmlFor="message"
                                className=" col-form-label text-right tm-color-primary">{params.Message}</label>
                            <div className="col-sm-12">
                                <textarea className="form-control mr-0 ml-auto" name="message" id="message" rows="8"
                                    onChange={(e) => setMessage(e.target.value)}
                                    required />
                            </div>
                        </div>
                        <div className="form-group row text-right">
                            <div className="col-12">
                                <button type="submit"
                                    onClick={async () => {
                                        await dispatch(postContactData({ 'name': name, 'email': email, 'subject': subject, 'message': message }))
                                    }}
                                    className="tm-btn tm-btn-primary tm-btn-small">{params.Submit}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    )
}
