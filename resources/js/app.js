import { Routes, Route } from 'react-router-dom'
import Home from "./features/home/Home";
import Books from "./features/books/Books";
import Authors from "./features/authors/Authors";
import NoteFound from "./Pages/NoteFound";
import Layout from "./features/layout/Layout";
import Contact from "./features/contact/Contact";
import Login from "./features/login/Login";
import Register from "./features/register/Register";
import Author from "./features/author/Author";
import Book from "./features/book/Book";


export default function App() {
    return (
        <Routes>
            <Route path={'/'} element={<Layout />}>
                <Route index element={<Home />} />
                <Route path={'/books'} element={<Books />} />
                <Route path={'/book'} element={<Book />} />
                <Route path={'/authors'} element={<Authors />} />
                <Route path={'/author'} element={<Author />} />
                <Route path={'/login'} element={<Login />} />
                <Route path={'/register'} element={<Register />} />
                <Route path={'/contacts'} element={<Contact />} />
                <Route path={'*'} element={<NoteFound />} />
            </Route>


        </Routes>
    );
}
