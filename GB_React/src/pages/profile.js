import { useDispatch, useSelector } from "react-redux"
import { toggleNameVisible } from "../store/profile"

export function Profile() {
  const { firstName } = useSelector((state) => state.profile.user)
  const nameVisible = useSelector((state) => state.profile.nameVisible)

  const dispatch = useDispatch()

  return (
    <div>
      <button onClick={() => dispatch(toggleNameVisible())}>toggle name</button>
      {nameVisible && <h2>name visible: {firstName}</h2>}
    </div>
  )
}
