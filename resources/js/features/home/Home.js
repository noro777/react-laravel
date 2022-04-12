import { useDispatch, useSelector } from "react-redux";
import { useEffect } from "react";
import { getAuthorIndexData, getBooksIndexData, indexAuthorData, indexBookData } from "./homeSlice";
import * as home from "../../includes/home";
import { getStateParams } from "../layout/layoutSlice";

export default function Home() {

    const dispatch = useDispatch()
    const books = useSelector(getBooksIndexData)
    const authors = useSelector(getAuthorIndexData)

    useEffect(() => {
        dispatch(indexBookData())
        dispatch(indexAuthorData())
    }, [])
    return (
        <div className="container-fluid">
            <main className="tm-main text-right">
                <home.books books={books} />
                <home.authors authors={authors} />
            </main>
        </div>
    );
}
