import userEvent from "@testing-library/user-event"
import { renderWithRedux } from "../../../utils/render-with-redux"
import { Chat } from "./chat"

let state = null

beforeEach(() => {
  state = {
    messages: {
      messages: { room1: [{ author: "User", message: "Test" }] },
    },
  }
})

describe("chat component", () => {
  it("should render chat with title prop", () => {
    const { container } = renderWithRedux(<Chat title="room1" />, {
      initialState: state,
    })

    const nodes = [...container.querySelectorAll(".text")]

    expect(nodes[0]).toHaveTextContent("room1")
    expect(nodes[1]).toHaveTextContent("User: Test")
  })

  it("should render chat with selected prop", () => {
    const { getByRole } = renderWithRedux(
      <Chat title="room1" selected={true} />,
      {
        initialState: state,
      },
    )

    expect(getByRole("button")).toHaveClass("Mui-selected")
  })

  it("should render chat with handleListItemClick prop", () => {
    const handleListItemClick = jest.fn()

    const { getByRole } = renderWithRedux(
      <Chat title="room1" handleListItemClick={handleListItemClick} />,
      {
        initialState: state,
      },
    )

    userEvent.click(getByRole("button"))

    expect(handleListItemClick).toBeCalledTimes(1)
  })

  // it("snapshot", () => {
  //   const { container } = renderWithRedux(<Chat title="room1" />, {
  //     initialState: state,
  //   })

  //   expect(container).toMatchSnapshot()
  // })
})
