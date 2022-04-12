import { useDispatch, useSelector } from "react-redux";
import { getStateParams } from "../layout/layoutSlice";
import { changeErrors, downloadFile, getBook, getErrors } from "./bookSlice";
import { useNavigate } from "react-router-dom";
import { Comments } from "../../includes/comments";
import { Errors } from "../../includes/layout";
import { useEffect } from "react";


export default function Book() {

    const params = useSelector(getStateParams)
    const book = useSelector(getBook)
    const errors = useSelector(getErrors)
    const navigate = useNavigate()
    const dispatch = useDispatch()

    useEffect(() => {
        setTimeout(() => {
            dispatch(changeErrors())
        }, 5000)
    }, [errors])

    return (
        <div className="container">

            <button onClick={() => navigate(-1)} className="btn btn-primary ml-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    className="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
                {params.back}
            </button>

            <main className="tm-main">
                <Errors errors={errors} />
                <div className="row tm-row">
                    <div className="col-12">
                        <hr className="tm-hr-primary tm-mb-55" />
                        <div className="tm-post-link-inner">
                            <img src={book.image} alt="Image" className="img-fluid" />
                        </div>
                    </div>
                </div>
                <div className="col-lg-8 tm-post-col">
                    <div className="tm-post-full">
                        <div className="mb-4">
                            <h2 className="pt-2 tm-color-primary tm-post-title">{book.name}</h2>
                            <p>
                                {book.text}
                            </p>
                            <div>
                                <button onClick={() => { dispatch(downloadFile(book.file)) }} className="btn btn-primary">{params.download}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <Comments />
            </main>
        </div>
    )
}
