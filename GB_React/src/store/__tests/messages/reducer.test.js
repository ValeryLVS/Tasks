import { removeConversationById } from "../../conversations"
import { messagesReducer, sendMessage, editMessage } from "../../messages"
import { GET_MESSAGES } from "../../messages/types"

describe("message reducer", () => {
  it("send message", () => {
    const state = messagesReducer(
      { messages: {} },
      sendMessage({ author: "Bot", message: "Test" }, "room1"),
    )

    expect(state.messages.room1.length).toBe(1)
    expect(state.messages.room1[0].author).toBe("Bot")
    expect(state.messages.room1[0]).toHaveProperty("message", "Test")
  })

  it("remove conversation messages", () => {
    const state = messagesReducer(
      { messages: { room1: [], room2: [] } },
      removeConversationById("room1"),
    )

    expect(Object.keys(state.messages)).toEqual(["room2"])
  })

  it("get messages", () => {
    const state = messagesReducer(
      { messages: {} },
      { type: GET_MESSAGES, payload: { room1: [1, 2, 3, 4] } },
    )

    expect(Object.keys(state.messages)).toEqual(["room1"])
    expect(state.messages.room1).toEqual([1, 2, 3, 4])
  })

  it("edit messages", () => {
    const state = messagesReducer(
      {
        messages: {
          room1: [
            { id: 2, author: "Bot", message: "Test" },
            { id: 1, author: "Bot", message: "Test" },
          ],
        },
      },
      editMessage("updated", "room1", 1),
    )

    expect(state.messages.room1[0].message).toBe("Test")
    expect(state.messages.room1[1].message).toBe("updated")
  })

  it("default messages", () => {
    const state = messagesReducer({
      messages: 1,
    })

    expect(state.messages).toBe(1)
  })
})
