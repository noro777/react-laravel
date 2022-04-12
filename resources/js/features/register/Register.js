import { useDispatch, useSelector } from "react-redux";
import { getStateParams, ifAuth } from "../layout/layoutSlice";
import { getErrors, register } from "./registerSlice";
import { useState } from "react";
import { Errors } from "../../includes/layout";
import { useNavigate } from "react-router-dom";

export default function Register() {

    const params = useSelector(getStateParams)
    const errors = useSelector(getErrors)
    const dispatch = useDispatch()
    const [name, setName] = useState('')
    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')
    const [password_confirmation, setPassword_confirmation] = useState('')
    const navigate = useNavigate();

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">{params.register}</div>

                        <div className="card-body">
                            <Errors errors={errors} />

                            <div className="row mb-3">
                                <label htmlFor="name" className="col-md-4 col-form-label text-md-end">{params.name}</label>

                                <div className="col-md-6">
                                    <input id="name" type="text" onChange={(e) => setName(e.target.value)} className="form-control" />
                                </div>
                            </div>

                            <div className="row mb-3">
                                <label htmlFor="email"
                                    className="col-md-4 col-form-label text-md-end">{params.email}</label>

                                <div className="col-md-6">
                                    <input id="email" type="email" onChange={(e) => setEmail(e.target.value)} className="form-control" />
                                </div>
                            </div>

                            <div className="row mb-3">
                                <label htmlFor="password"
                                    className="col-md-4 col-form-label text-md-end">{params.Password}</label>

                                <div className="col-md-6">
                                    <input id="password" onChange={(e) => setPassword(e.target.value)} type="password" className="form-control" />
                                </div>
                            </div>

                            <div className="row mb-3">
                                <label htmlFor="password-confirm"
                                    className="col-md-4 col-form-label text-md-end">{params.Confirm}</label>

                                <div className="col-md-6">
                                    <input id="password-confirm" onChange={(e) => setPassword_confirmation(e.target.value)} type="password" className="form-control"
                                        name="password_confirmation" required />
                                </div>
                            </div>

                            <div className="row mb-0">
                                <div className="col-md-6 offset-md-4">
                                    <button onClick={async () => {
                                        await dispatch(register({ 'name': name, 'email': email, 'password': password, 'password_confirmation': password_confirmation }))
                                            .then((res) => {
                                                if (!res.error) {
                                                    dispatch(ifAuth())
                                                    navigate('/')
                                                }
                                            })
                                    }
                                    }
                                        className="btn btn-primary">
                                        {params.register}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    )
}
