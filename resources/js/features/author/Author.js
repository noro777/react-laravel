import { useSelector } from "react-redux";
import { getStateParams } from "../layout/layoutSlice";
import { getAuthor } from "./authorSlice";
import { useNavigate } from "react-router-dom";
import { Comments } from "../../includes/comments";

export default function Author() {

    const params = useSelector(getStateParams)
    const author = useSelector(getAuthor)
    const navigate = useNavigate()

    return (
        <div className="container mr-0">
            <button onClick={() => navigate(-1)} className="btn btn-primary ml-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    className="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
                {params.back}
            </button>
            <main className="tm-main mr-5">

                <div className="row tm-row tm-mb-45">
                    <div className="col-12">
                        <hr className="tm-hr-primary tm-mb-55" />
                        <img src={author.image} alt="Image" className="img-fluid" />
                    </div>
                </div>
                <div className="row tm-row tm-mb-40">
                    <div className="col-12">
                        <div className="mb-4">
                            <h2 className="pt-2 tm-mb-40 tm-color-primary tm-post-title">{author.name}</h2>
                            {author.text}
                        </div>
                    </div>
                </div>


                <div>
                    <p>
                        {params.his_books}
                    </p>
                </div>
                {
                    author.books ?
                        author.books[0].length !== 0 ?
                            author.books[0].map((book) => {
                                return (
                                    <>
                                        <div className="col-12">
                                            <hr className="tm-hr-primary  tm-mb-55" />
                                        </div>

                                        <div className="col-lg-6 tm-mb-60 tm-person-col">
                                            <div>
                                                {/*<a href="{{ route('book',['id'=>$book->id]) }}">{{$book->name}}</a>*/}
                                            </div>
                                            <div className="media tm-person">
                                                <img src="#" alt="Image" className="img-fluid mr-4" />
                                                <div className="media-body">
                                                    <p className="mb-0 tm-line-height-short">
                                                        {book.text}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </>
                                )
                            })
                            : params.no_books
                        :
                        ''
                }

                <Comments />


            </main>
        </div>

    );
}
