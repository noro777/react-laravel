import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { getBooksData } from "./booksApi";

const initialState = {
    books: ''
}

export const getBooks = (state) => state.books.books

export const getAllBooks = createAsyncThunk(
    'books/async/getBooksAllData',
    async () => await getBooksData()
)

export const booksSlice = createSlice({
    name: 'books',
    initialState,
    reducers: {
        books_search_data: (state, action) => {
            state.books = action.payload
        },
    },

    extraReducers: builder => {
        builder
            .addCase(getAllBooks.fulfilled, (state, action) => {
                state.books = action.payload[0]
            })
    }
})

export const books_search_data = booksSlice.actions.books_search_data

export default booksSlice.reducer
