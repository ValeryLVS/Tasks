import axios from "axios"
import { withLogger } from "./logger"

class Request {
  constructor(token) {
    this.request = withLogger(
      axios.create({
        baseURL: "https://api.github.com",
      }),
    )
    this.token = token
  }

  requestWithToken = () => {
    return {
      headers: { "x-token": this.token },
    }
  }

  get = (url, withAuth) => {
    let config = {}

    if (withAuth) {
      config = { ...config, ...this.requestWithToken() }
    }

    return this.request.get(url, config)
  }

  post = (url, params, withAuth) => {
    let config = {}

    if (withAuth) {
      config = { ...config, ...this.requestWithToken() }
    }

    return this.request.post(url, params, config)
  }
}

export const request = new Request("test token")
