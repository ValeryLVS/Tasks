export const logger = (store) => (next) => (action) => {
  console.log("dispatching", action)
  console.log("prev state", store.getState())

  const result = next(action)

  console.log("next state", store.getState())

  return result
}
