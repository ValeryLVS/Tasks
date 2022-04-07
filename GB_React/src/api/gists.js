import { request } from "./request"

export const getGistsApi = (page) => request.get(`/gists/public?page=${page}`)

export const searchGistsByUserNameApi = (user) =>
  request.get(`/users/${user}/gists`)
