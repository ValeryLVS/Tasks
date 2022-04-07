export const report = () => (next) => (action) => {
  try {
    return next(action)
  } catch (e) {
    console.error("Some error: ", e)
    // api.sendReport(e, action)
  }
}
