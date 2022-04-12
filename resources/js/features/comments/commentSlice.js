import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { getAuthorData, postCommentData } from "./commentApi";
import { layoutSlice } from "../layout/layoutSlice";

const initialState = {
    status: '',
    errors: ''
}

export const getStatus = (state) => state.comment.status
export const getErrors = (state) => state.comment.errors

export const postComment = createAsyncThunk(
    'comment/async/postComment',
    async (data) => await postCommentData(data)
)

export const commentSlice = createSlice({
    name: 'comment',
    initialState,
    reducers: {
        changeStatus: (state, action) => {
            state.status = action.payload
        },
        changeErrors: (state, action) => {
            state.errors = action.payload
        }

    },

    extraReducers: builder => {
        builder
            .addCase(postComment.fulfilled, (state, action) => {
                state.errors = ''
                state.status = action.payload.data
            })
            .addCase(postComment.rejected, (state, action) => {
                state.status = ''
                state.errors = action.error.message
            })
    }
})

export const changeStatus = commentSlice.actions.changeStatus
export const changeErrors = commentSlice.actions.changeErrors

export default commentSlice.reducer
