import { useDispatch, useSelector } from "react-redux";
import { getStateParams, ifAuth } from "../layout/layoutSlice";
import { useState } from "react";
import { getErrors, login } from "./loginSlice";
import { Errors } from "../../includes/layout";
import { useNavigate } from "react-router-dom";

export default function Login() {

    const dispatch = useDispatch();
    const params = useSelector(getStateParams)
    const errors = useSelector(getErrors)
    const [email, setEmail] = useState()
    const [password, setPassword] = useState()
    const navigate = useNavigate();


    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">{params.login}</div>

                        <div className="card-body">
                            <div>

                            </div>

                            <Errors errors={errors} />
                            {/*{unset(errors)}*/}
                            <div className="row mb-3">
                                <label className="col-md-4 col-form-label text-md-end">{params.email}</label>

                                <div className="col-md-6">
                                    <input id="email" type="email" className="form-control"
                                        onChange={(e) => setEmail(e.target.value)}
                                    />
                                </div>
                            </div>

                            <div className="row mb-3">
                                <label className="col-md-4 col-form-label text-md-end">{params.password}</label>

                                <div className="col-md-6">
                                    <input id="password" type="password" className="form-control" name="password"
                                        onChange={(e) => setPassword(e.target.value)}
                                    />
                                </div>
                            </div>

                            {/*<div className="row mb-3">*/}
                            {/*    <div className="col-md-6 offset-md-4">*/}
                            {/*        <div className="form-check">*/}
                            {/*            <input className="form-check-input" type="checkbox" name="remember" id="remember"*/}
                            {/*            />*/}
                            {/*                <label className="form-check-label" >*/}
                            {/*                    {params.Remember}*/}
                            {/*                </label>*/}
                            {/*        </div>*/}
                            {/*    </div>*/}
                            {/*</div>*/}

                            <div className="row mb-0">
                                <div className="col-md-8 offset-md-4">

                                    <button type="submit" className="btn btn-primary"
                                        onClick={async () => {
                                            await dispatch(login({ 'email': email, 'password': password })).then((res) => {
                                                if (!res.error) {
                                                    dispatch(ifAuth())
                                                    navigate(-1)
                                                }
                                            })
                                        }}
                                    >
                                        {params.login}
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
