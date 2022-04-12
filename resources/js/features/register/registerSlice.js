import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { registerApi } from "./registerApi";

const initialState = {
    email: '',
    password: '',
    errors: ''
}

export const getErrors = (state) => state.register.errors

export const register = createAsyncThunk(
    'register/async/login',
    async (data) => await registerApi(data)
)

export const registerSlice = createSlice({
    name: 'register',
    initialState,
    reducers: {

    },

    extraReducers: builder => {
        builder
            .addCase(register.fulfilled, (state, action) => {
                state.email = action.payload
                console.log(action)
            })
            .addCase(register.rejected, (state, action) => {
                state.errors = action.error.message
                console.log(action.error.message)
            })
    }
})

export default registerSlice.reducer
