import { useDispatch, useSelector } from "react-redux";
import { getauthUser, getIfUserAuth, getStateParams, getUser } from "../features/layout/layoutSlice";
import { Link } from "react-router-dom";
import { useEffect, useState } from "react";
import { changeErrors, changeStatus, getErrors, getStatus, postComment } from "../features/comments/commentSlice";
import { Errors } from "./layout";
import { getAuthor, getAuthorById } from "../features/author/authorSlice";
import { getBook, getBookById } from "../features/book/bookSlice";

function comment(comments) {
    return (
        comments ?
            comments[0].map((comment) => {
                return (
                    <div className="col-lg-6 tm-mb-60 tm-person-col">
                        <div>
                            {comment.name}
                        </div>
                        <div className="media tm-person">
                            <div className="media-body">
                                <p className="mb-0 tm-line-height-short">
                                    {comment.message}
                                </p>
                            </div>
                        </div>
                    </div>
                )
            })
            : ''
    )
}

export function Comments() {
    const author = useSelector(getAuthor)
    const book = useSelector(getBook)
    const params = useSelector(getStateParams)
    const ifUserAuth = useSelector(getIfUserAuth)
    const status = useSelector(getStatus)
    const errors = useSelector(getErrors)
    const authUser = useSelector(getUser)
    const dispatch = useDispatch()
    const [message, setMessage] = useState('')
    const is = window.location.pathname === '/book'
    useEffect(() => {
        dispatch(getauthUser())
    }, [])

    if (ifUserAuth)
        return (
            <>
                <hr />
                <div>
                    {params.comments}
                </div>
                {is ? comment(book.comments) : comment(author.comments)}
                <hr />

                <div>
                    {params.leave_comment}
                </div>
                <Errors errors={errors} />
                {status !== ''
                    ?
                    status
                    : ''
                }
                <div className="form-group row mb-5">
                    <label htmlFor="message"
                        className="col-sm-3 col-form-label text-right tm-color-primary">Message</label>
                    <div className="col-sm-9">
                        <textarea className="form-control mr-0 ml-auto" value={message} name="message" id="message" rows="8"
                            required onChange={(e) => setMessage(e.target.value)} />
                    </div>
                </div>
                <div className="form-group row text-right">
                    <div className="col-12">
                        <button type="submit" className="tm-btn tm-btn-primary tm-btn-small" onClick={async () => {
                            const data = { 'name': authUser.name, 'message': message, 'author_id': author.id ?? null, 'book_id': book.id ?? null }
                            await dispatch(postComment(data))
                                .then((res) => {
                                    if (!res.error) {
                                        if (is) {
                                            dispatch(getBookById(book.id))
                                        } else {
                                            dispatch(getAuthorById(author.id))
                                        }
                                        setMessage('')
                                        setTimeout(() => {
                                            dispatch(changeStatus(''))
                                        }, 5000)
                                    } else {
                                        setTimeout(() => {
                                            dispatch(changeErrors(''))
                                        }, 5000)
                                    }
                                })
                        }
                        }>Submit
                        </button>
                    </div>
                </div>
            </>
        )

    return (
        <>
            {is ? params.girq : params.grox}
            <Link to={'/register'}> {params.register} </Link>
            {params.kam}
            <Link to={'/login'}> {params.login} </Link>
        </>

    )
}
