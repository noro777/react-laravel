import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { getAuthorsIndexData, getBookIndexData } from "./homeApi";

const initialState = {
    authors: '',
    books: ''
}

export const getAuthorIndexData = (state) => state.home.authors
export const getBooksIndexData = (state) => state.home.books

export const indexBookData = createAsyncThunk(
    'home/async/getBookIndexData',
    async () => await getBookIndexData()
)

export const indexAuthorData = createAsyncThunk(
    'home/async/getAuthorsIndexData',
    async () => await getAuthorsIndexData()
)

export const homeSlice = createSlice({
    name: 'home',
    initialState,
    reducers: {

    },

    extraReducers: builder => {
        builder
            .addCase(indexBookData.fulfilled, (state, action) => {
                state.books = action.payload[0]
            })
            .addCase(indexAuthorData.fulfilled, (state, action) => {
                state.authors = action.payload[0]
            })
    }
})

export default homeSlice.reducer
