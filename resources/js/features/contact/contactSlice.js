import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { contactApi } from "./contactApi";

const initialState = {
    status: '',
    errors: ''
}

export const getStatus = (state) => state.contact.status
export const getErrors = (state) => state.contact.errors


export const postContactData = createAsyncThunk(
    'contact/async/postNewContact',
    async (data, thunkAPI) => await contactApi(data, thunkAPI)
)

export const contactSlice = createSlice({
    name: 'contact',
    initialState,
    reducers: {
        change: (state) => {
            state.status = ''
            state.errors = ''
        }
    },

    extraReducers: builder => {
        builder
            .addCase(postContactData.fulfilled, (state, action) => {
                state.status = action.payload.data
            })
            .addCase(postContactData.rejected, (state, action) => {
                state.errors = action.error.message
            })
    }
})

export const change = contactSlice.actions.change

export default contactSlice.reducer
