import { renderHook } from "@testing-library/react-hooks"
import { useCounter } from "./useCounter"

describe("useCounter", () => {
  it("should call useCounter", () => {
    const { result } = renderHook(() => useCounter())

    expect(result.current.count).toBe(0)
    expect(typeof result.current.increment).toBe("function")
  })

  it("should call increment", () => {
    const { result } = renderHook(() => useCounter())

    result.current.increment()

    expect(result.current.count).toBe(1)
  })

  it("should call increment with initial value", () => {
    const { result } = renderHook(() => useCounter(10))

    result.current.increment()

    expect(result.current.count).toBe(11)
  })

  it("should call reset", () => {
    const { result, rerender } = renderHook(
      ({ initialValue }) => useCounter(initialValue),
      {
        initialValue: 0,
      },
    )

    rerender({ initialValue: 10 })

    result.current.reset()

    expect(result.current.count).toBe(10)
  })

  it("should call incrementAsync", async () => {
    const { result, waitForNextUpdate } = renderHook(() => useCounter(0))

    result.current.incrementAsync()

    await waitForNextUpdate()

    expect(result.current.count).toBe(1)
  })
})
