import { useDispatch, useSelector } from "react-redux";
import { getStateParams } from "../features/layout/layoutSlice";
import { useState } from "react";
import { authors_search, books_search, changeErrors, getErrors } from "../features/search/searchSlice";
import { books_search_data } from "../features/books/bookSlice";
import { Errors } from "./layout";
import { authors_search_data } from "../features/authors/authorsSlice";

export default function Search() {

    const params = useSelector(getStateParams)
    const dispatch = useDispatch()
    const [query, setQuery] = useState('')
    const errors = useSelector(getErrors)
    const is = window.location.pathname === '/books'

    return (
        <div className="row tm-row">
            <div className="col-12">
                <Errors errors={errors} />
                <input className="form-control tm-search-input" name="query" type="text"
                    placeholder={params.search} aria-label="Search" onChange={(e) => setQuery(e.target.value)} />
                <button className="tm-search-button" type="submit" onClick={async () => {
                    if (is) {
                        await dispatch(books_search({ query })).then((res) => {
                            if (!res.error)
                                dispatch(books_search_data(res.payload.data.data[0]))
                            else {
                                setTimeout(() => {
                                    dispatch(changeErrors(''))
                                }, 5000)
                            }
                        })
                    }
                    else {
                        await dispatch(authors_search({ query })).then((res) => {
                            if (!res.error)
                                dispatch(authors_search_data(res.payload.data.data[0]))
                            else {
                                setTimeout(() => {
                                    dispatch(changeErrors(''))
                                }, 5000)
                            }
                        })

                    }
                }}>
                    <i className="fas fa-search tm-search-icon" aria-hidden="true" />
                </button>
            </div>
        </div>
    )
}
