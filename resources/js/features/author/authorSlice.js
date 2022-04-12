import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { getAuthorData } from "./authorApi";

const initialState = {
    author: ''
}

export const getAuthor = (state) => state.author.author

export const getAuthorById = createAsyncThunk(
    'author/async/getAuthorData',
    async (id) => await getAuthorData(id)
)

export const authorSlice = createSlice({
    name: 'author',
    initialState,
    reducers: {

    },

    extraReducers: builder => {
        builder
            .addCase(getAuthorById.fulfilled, (state, action) => {
                state.author = action.payload
            })
    }
})

export default authorSlice.reducer
