import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { getAuthUser, getParams, ifUserAuth } from "./layoutApi";

const initialState = {
    params: [],
    ifAuth: false,
    authUser: null,
    active: window.location.pathname.split("/")[1],
    load: ''
}


export const getStateParams = (state) => state.layout.params
export const getIfUserAuth = (state) => state.layout.ifAuth
export const getLoad = (state) => state.layout.load
export const getUser = (state) => state.layout.authUser


export const getActiveIfContact = (state) => {
    if (state.layout.active === 'contact')
        return 'active'
    else return ''
}
export const getActiveIfBooks = (state) => {
    if (state.layout.active === 'books')
        return 'active'
    else return ''
}
export const getActiveIfAuthors = (state) => {
    if (state.layout.active === 'authors')
        return 'active'
    else return ''
}
export const getActiveIfHome = (state) => {
    if (state.layout.active === '')
        return 'active'
    else return ''
}

export const Params = createAsyncThunk(
    'layout/async/getParams',
    async () => await getParams()
)

export const ifAuth = createAsyncThunk(
    'layout/async/getIfUserAuth',
    async () => await ifUserAuth()
)

export const getauthUser = createAsyncThunk(
    'layout/async/getAuthUser',
    async () => await getAuthUser()
)

export const layoutSlice = createSlice({
    name: 'layout',
    initialState,
    reducers: {
        active: (state, action) => {
            state.active = action.payload
        },
    },

    extraReducers: builder => {
        builder
            .addCase(Params.fulfilled, (state, action) => {
                state.params = action.payload
                state.load = 'fulfilled'
            })
            .addCase(Params.pending, (state, action) => {
                state.load = 'pending'
            })
            .addCase(ifAuth.fulfilled, (state, action) => {
                state.ifAuth = action.payload
            })
            .addCase(getauthUser.fulfilled, (state, action) => {
                state.authUser = action.payload
            })
    }
})

export const active = layoutSlice.actions.active
// export const authUser = layoutSlice.actions.authUser

export default layoutSlice.reducer
