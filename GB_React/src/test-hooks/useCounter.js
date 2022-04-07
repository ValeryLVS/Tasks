import React, { useState, useContext, useCallback, createContext } from "react"

const CounterContext = createContext(1)

export const CounterProvider = ({ children, step }) => {
  return (
    <CounterContext.Provider value={step}>{children}</CounterContext.Provider>
  )
}

export const useCounter = (value = 0) => {
  const [count, setCount] = useState(value)
  const step = useContext(CounterContext)

  const increment = useCallback(() => setCount((c) => c + step), [step])
  const incrementAsync = useCallback(
    () => setTimeout(increment, 100),
    [increment],
  )

  const reset = useCallback(() => setCount(value), [value])

  if (count > 9000) {
    throw Error("opps 9000")
  }

  return { count, increment, incrementAsync, reset }
}
