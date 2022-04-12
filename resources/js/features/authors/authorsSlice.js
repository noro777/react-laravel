import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { getAuthorsData } from "./authorsApi";

const initialState = {
    authors: ''
}

export const getAuthors = (state) => state.authors.authors

export const getAllAuthors = createAsyncThunk(
    'authors/async/getAuthorsAllData',
    async () => await getAuthorsData()
)


export const authorsSlice = createSlice({
    name: 'authors',
    initialState,
    reducers: {
        authors_search_data: (state, action) => {
            state.authors = action.payload
        },
    },

    extraReducers: builder => {
        builder
            .addCase(getAllAuthors.fulfilled, (state, action) => {
                state.authors = action.payload[0]
            })
    }
})

export const authors_search_data = authorsSlice.actions.authors_search_data

export default authorsSlice.reducer
