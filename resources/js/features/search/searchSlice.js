import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { searchApiAuthors, searchApiBooks } from "./searchApi";

const initialState = {
    errors: ''
}

export const getErrors = (state) => state.search.errors

export const books_search = createAsyncThunk(
    'search/async/books_search',
    async (data) => await searchApiBooks(data)
)
export const authors_search = createAsyncThunk(
    'search/async/authors_search',
    async (data) => await searchApiAuthors(data)
)

export const searchSlice = createSlice({
    name: 'search',
    initialState,
    reducers: {
        changeErrors: (state, action) => {
            state.errors = action.payload
        }
    },

    extraReducers: builder => {
        builder
            .addCase(books_search.rejected, (state, action) => {
                state.errors = action.error.message
            })
            .addCase(authors_search.rejected, (state, action) => {
                state.errors = action.error.message
            })
    }
})

export const changeErrors = searchSlice.actions.changeErrors

export default searchSlice.reducer
