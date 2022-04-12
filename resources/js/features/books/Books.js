import { useDispatch, useSelector } from "react-redux";
import { getStateParams } from "../layout/layoutSlice";
import { useEffect } from "react";
import { getAllBooks, getBooks } from "./bookSlice";
import { Link } from "react-router-dom";
import { getBookById } from "../book/bookSlice";
import Search from "../../includes/search";


export default function Books() {

    const params = useSelector(getStateParams)
    const books = useSelector(getBooks)

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(getAllBooks())
    }, [])

    return (
        <div className="container-fluid">

            <main className="tm-main text-right">
                <Search />
                <div className="row ">
                    {books ?
                        books.map((book) =>
                            <div className="col-sm">
                                <article className="col-12 col-md-6 tm-post">
                                    <Link to={'/book'} onClick={() => dispatch(getBookById(book.id))}
                                        className="effect-lily tm-post-link tm-pt-60">
                                        <div className="tm-post-link-inner">
                                            <img src={book.image} alt="Image" className="img-fluid" />
                                        </div>
                                        {book.is_now ? <span className="position-absolute tm-new-badge">{params.new}</span> : ''}
                                        <h2 className="tm-pt-30 tm-color-primary tm-post-title">{book.name}</h2>
                                    </Link>
                                    <p className="tm-pt-30">
                                        {book.text}
                                    </p>
                                </article>
                            </div>
                        )
                        : ''
                    }
                </div>
            </main>
        </div>
    );
}
