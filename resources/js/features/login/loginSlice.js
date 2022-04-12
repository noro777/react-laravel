import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { loginApi } from "./loginApi";

const initialState = {
    data: '',
    errors: ''
}

export const getErrors = (state) => state.login.errors

export const login = createAsyncThunk(
    'login/async/login',
    async (data) => await loginApi(data)
)

export const loginSlice = createSlice({
    name: 'login',
    initialState,
    reducers: {

    },

    extraReducers: builder => {
        builder
            .addCase(login.fulfilled, (state, action) => {
                state.errors = ''
                state.data = action.payload.data
            })
            .addCase(login.rejected, (state, action) => {
                state.data = ''
                state.errors = action.error.message
            })
    }
})

export default loginSlice.reducer
