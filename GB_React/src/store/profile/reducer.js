import { TOGLE_NAME_VISIBLE } from "./types"

const initialState = {
  nameVisible: true,
  user: {
    id: "test",
    firstName: "Test user",
  },
}

export const profileReducer = (state = initialState, action) => {
  switch (action.type) {
    case TOGLE_NAME_VISIBLE:
      return {
        ...state,
        nameVisible: !state.nameVisible,
      }
    default:
      return state
  }
}
