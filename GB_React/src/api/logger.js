export const withLogger = (axios) => {
  axios.interceptors.request.use(
    (request) => {
      console.log(
        `%c AXIOS [request] ${request.url}:`,
        "color: #008000; font-weight: bold",
        request,
      )

      return request
    },
    (error) => {
      console.log(`%c AXIOS [request]`, "color: red; font-weight: bold", error)

      return Promise.reject(error)
    },
  )

  axios.interceptors.response.use(
    (config) => {
      console.log(
        `%c AXIOS [response-success] ${config.config.url}:`,
        "color: #008000; font-weight: bold",
        config,
      )

      return config
    },
    (error) => {
      console.log(
        `%c AXIOS [response-error]`,
        "color: red; font-weight: bold",
        error,
      )

      return Promise.reject(error.response)
    },
  )

  return axios
}
