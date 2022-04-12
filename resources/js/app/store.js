import layoutReducer from "../features/layout/layoutSlice";
import homeReducer from '../features/home/homeSlice'
import authorsReducer from '../features/authors/authorsSlice'
import authorReducer from '../features/author/authorSlice'
import booksReducer from '../features/books/bookSlice'
import bookReducer from '../features/book/bookSlice'
import loginReducer from '../features/login/loginSlice'
import registerReducer from '../features/register/registerSlice'
import contactReducer from '../features/contact/contactSlice'
import commentReducer from '../features/comments/commentSlice'
import searchReducer from '../features/search/searchSlice'
import { configureStore } from "@reduxjs/toolkit";

export const store = configureStore({
    reducer: {
        layout: layoutReducer,
        home: homeReducer,
        authors: authorsReducer,
        author: authorReducer,
        books: booksReducer,
        book: bookReducer,
        login: loginReducer,
        register: registerReducer,
        contact: contactReducer,
        comment: commentReducer,
        search: searchReducer,
    }
});
