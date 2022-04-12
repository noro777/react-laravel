import { useDispatch, useSelector } from "react-redux";
import { active, getIfUserAuth, getLoad, getStateParams, ifAuth } from "../features/layout/layoutSlice";
import { Link, Outlet, useNavigate } from "react-router-dom";
import { logoutApi } from "../features/layout/layoutApi";

export function Errors(props) {
    if (props.errors) {
        return (
            <div className="alert alert-danger" role="alert">
                {props.errors}
            </div>
        )
    }
    return ''
}

export function Greeting() {

    const params = useSelector(getStateParams)
    const navigate = useNavigate()
    const dispatch = useDispatch()
    const ifUserAuth = useSelector(getIfUserAuth)

    if (ifUserAuth) {
        return (
            <>
                <button className="btn btn-primary" onClick={async () => {
                    await logoutApi().then(() => {
                        navigate('/')
                        dispatch(active(''))
                        dispatch(ifAuth())
                    })
                }}>
                    {params.logout}
                </button>
            </>
        )
    }
    return (
        <div>
            <Link className="btn btn-primary" to={'/login'}>{params.login}</Link>
            <Link className="btn btn-primary" to={'/register'}>{params.register}</Link>
        </div>

    );
}

export function Load() {
    const load = useSelector(getLoad)

    if (load === 'pending') {
        return (
            <div className="loader" />
        )
    }

    return (
        <Outlet />
    )
}
