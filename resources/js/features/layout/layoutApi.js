export async function ifUserAuth() {
    const { data: response } = await axios.get('api/ifAuth')
    return response
}

export async function getAuthUser() {
    const { data: response } = await axios.get('/api/getAuthUser')

    return response
}
export async function getParams() {
    const { data: response } = await axios.get('api/getParams')
    return response
}


export async function logoutApi() {
    await axios.post('api/logout')
}

export async function getLang(lang) {
    await axios.get('/api/lang/' + lang)
}
