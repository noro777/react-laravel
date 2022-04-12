import { useDispatch, useSelector } from "react-redux";
import { getStateParams } from "../layout/layoutSlice";
import { useEffect } from "react";
import { getAllAuthors, getAuthors } from "./authorsSlice";
import { Link } from "react-router-dom";
import { getAuthorById } from "../author/authorSlice";
import Search from "../../includes/search";

export default function Authors() {

    const params = useSelector(getStateParams)
    const authors = useSelector(getAuthors)

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(getAllAuthors())
    }, [])

    return (
        <div className="container-fluid">
            <main className="tm-main text-right">
                <Search />


                <div className="row ">
                    {authors ?
                        authors.map((author) =>
                            <div className="col-sm">
                                <article className="col-12 col-md-6 tm-post">
                                    <a href="#"
                                        className="effect-lily tm-post-link tm-pt-60">
                                        <div className="tm-post-link-inner">
                                            <Link to={'/author'} onClick={() => dispatch(getAuthorById(author.id))}>
                                                <img src={author.image} alt="Image"
                                                    className="img-fluid" />
                                            </Link>

                                        </div>
                                        {/*<span className="position-absolute tm-new-badge">{params.new}</span>*/}
                                        <Link to={'/author'} onClick={() => dispatch(getAuthorById(author.id))} className="tm-pt-30 tm-color-primary tm-post-title">{author.name}</Link>
                                    </a>
                                    <p className="tm-pt-30">
                                        {author.text}
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
