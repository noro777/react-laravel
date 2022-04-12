import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { getBookData, getFile } from "./bookApi";

const initialState = {
    book: '',
    errors: ''
}

export const getBook = (state) => state.book.book
export const getErrors = (state) => state.book.errors

export const getBookById = createAsyncThunk(
    'book/async/getBookById',
    async (id) => await getBookData(id)
)

export const downloadFile = createAsyncThunk(
    'book/async/downloadFile',
    async (filename) => await getFile(filename)
)

export const bookSlice = createSlice({
    name: 'book',
    initialState,
    reducers: {
        changeErrors: (state) => {
            state.errors = ''
        }
    },

    extraReducers: builder => {
        builder
            .addCase(getBookById.fulfilled, (state, action) => {
                state.book = action.payload
            })
            .addCase(downloadFile.fulfilled, (state, action) => {
                let blob = new Blob([action.payload])
                console.log(action)
                let link = document.createElement('a')
                link.href = window.URL.createObjectURL(blob)
                link.download = action.meta.arg
                link.click()
            })
            .addCase(downloadFile.rejected, (state, action) => {
                state.errors = action.error.message
            })
    }
})

export const changeErrors = bookSlice.actions.changeErrors

export default bookSlice.reducer
