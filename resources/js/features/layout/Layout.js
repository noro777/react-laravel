import { Link } from "react-router-dom";
import * as layout from '../../includes/layout'
import { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import {
    getStateParams,
    ifAuth,
    Params,
    active,
    getActiveIfHome, getActiveIfAuthors, getActiveIfBooks, getActiveIfContact
} from "./layoutSlice";
import { getLang } from "./layoutApi";
import { Load } from "../../includes/layout";

export default function Layout() {

    const dispatch = useDispatch()
    const params = useSelector(getStateParams)
    const home = useSelector(getActiveIfHome)
    const authors = useSelector(getActiveIfAuthors)
    const books = useSelector(getActiveIfBooks)
    const contact = useSelector(getActiveIfContact)


    useEffect(() => {
        dispatch(ifAuth())
        dispatch(Params())
    }, [])

    return (
        <div className="d-flex flex-direction-row justify-content-center">

            <header className="tm-header" id="tm-header">

                <div className="d-inline-flex flex-column ">
                    <layout.Greeting />

                    <div>
                        <button onClick={() => {
                            getLang('hy')
                            dispatch(Params())
                        }} className="btn btn-primary">{params.hay}</button>
                        <button onClick={() => {
                            getLang('ru')
                            dispatch(Params())
                        }} className="btn btn-primary">{params.ru}</button>
                        <button onClick={() => {
                            getLang('en')
                            dispatch(Params())
                        }} className="btn btn-primary">{params.en}</button>
                    </div>
                </div>


                <div className="tm-header-wrapper">
                    <button className="navbar-toggler" type="button" aria-label="Toggle navigation">
                        <i className="fas fa-bars" />
                    </button>
                    <div className="tm-site-header">
                        <div className="mb-3 mx-auto tm-site-logo"><i className="fas fa-times fa-2x" /></div>
                        <h1 className="text-center">{params.books_blog}</h1>
                    </div>


                    <nav className="tm-nav" id="tm-nav">
                        <ul>
                            <li className={"tm-nav-item " + home} onClick={() => dispatch(active(''))}>
                                <Link to={'/'} className="tm-nav-link">
                                    <i className="fas fa-home" />
                                    {params.home}
                                </Link>
                            </li>
                            <li className={"tm-nav-item " + authors} onClick={() => dispatch(active('authors'))}>
                                <Link to={'/authors'} className="tm-nav-link">
                                    <i className="fas fa-users" />
                                    {params.authors}
                                </Link>
                            </li>
                            <li className={"tm-nav-item " + books} onClick={() => dispatch(active('books'))}>
                                <Link to={'/books'} className="tm-nav-link">
                                    <i className="fas fa-book" />
                                    {params.books}
                                </Link>
                            </li>
                            <li className={"tm-nav-item " + contact} onClick={() => dispatch(active('contact'))}>
                                <Link to={'/contacts'} className="tm-nav-link">
                                    <i className="far fa-comments" />
                                    {params.contact}
                                </Link>
                            </li>
                        </ul>
                    </nav>

                    <div className="tm-mb-65">
                        <a rel="nofollow" href="https://fb.com/" className="tm-social-link">
                            <i className="fab fa-facebook tm-social-icon" />
                        </a>
                        <a href="https://twitter.com" className="tm-social-link">
                            <i className="fab fa-twitter tm-social-icon" />
                        </a>
                        <a href="https://instagram.com" className="tm-social-link">
                            <i className="fab fa-instagram tm-social-icon" />
                        </a>
                        <a href="https://linkedin.com" className="tm-social-link">
                            <i className="fab fa-linkedin tm-social-icon" />
                        </a>
                    </div>

                </div>
            </header>

            <Load />

        </div>

    );
}
