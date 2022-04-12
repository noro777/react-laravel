import { useDispatch, useSelector } from "react-redux";
import { active, getStateParams, Params } from "../features/layout/layoutSlice";
import { Link } from "react-router-dom";
import { getAuthorById } from "../features/author/authorSlice";
import { getBookById } from "../features/book/bookSlice";

function booksButton() {
    const params = useSelector(getStateParams)
    const dispatch = useDispatch()
    return (
        <div className="d-block ">
            <Link to={'/books'} onclick={() => dispatch(active('books'))} className="btn btn-primary">{params.all_books} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
            </svg></Link>
        </div>
    )
}
function book(books) {
    const params = useSelector(getStateParams)
    const dispatch = useDispatch()
    return (
        <div className="row">
            {
                books.map((book) => (
                    <div className="col-sm">
                        <article className="col-12 col-md-6 tm-post">
                            <Link to={'/book'} onClick={() => dispatch(getBookById(book.id))}
                                className="effect-lily tm-post-link tm-pt-60">
                                <div className="tm-post-link-inner">
                                    <img src={book.image} alt="Image"
                                        className="img-fluid" />
                                </div>
                                <span className="position-absolute tm-new-badge">{params.new}</span>
                                <h2 className="tm-pt-30 tm-color-primary tm-post-title">{book.name}</h2>
                            </Link>
                            <p className="tm-pt-30">
                                {book.text}
                            </p>
                        </article>
                    </div>
                ))
            }
        </div>

    )
}


export function books(props) {
    let books = props.books
    if (books)
        return (
            <>
                {
                    book(books)
                }
                {
                    booksButton()
                }
            </>
        )

    else return (
        ''
    )
}

function authorsButton() {
    const params = useSelector(getStateParams)
    const dispatch = useDispatch()
    return (
        <div className="d-block ">
            <Link to={'/authors'} onClick={() => dispatch(active('authors'))} className="btn btn-primary">{params.all_authors} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
            </svg>
            </Link>
        </div>
    )
}
function author(authors) {
    const params = useSelector(getStateParams)
    const dispatch = useDispatch()
    return (
        <div className="row">
            {
                authors.map((author) => (
                    <div className="col-sm">
                        <article className="col-12 col-md-6 tm-post">
                            <Link to={'/author'} onClick={() => dispatch(getAuthorById(author.id))}
                                className="effect-lily tm-post-link tm-pt-60">
                                <div className="tm-post-link-inner">
                                    <img src={author.image} alt="Image"
                                        className="img-fluid" />
                                </div>
                                <span className="position-absolute tm-new-badge">{params.new}</span>
                                <h2 className="tm-pt-30 tm-color-primary tm-post-title">{author.name}</h2>
                            </Link>
                            <p className="tm-pt-30">
                                {author.text}
                            </p>
                        </article>
                    </div>
                ))
            }
        </div>

    )
}

export function authors(props) {
    let authors = props.authors
    if (authors)
        return (
            <>
                {
                    author(authors)
                }
                {
                    authorsButton()
                }
            </>
        )

    else return (
        ''
    )
}

