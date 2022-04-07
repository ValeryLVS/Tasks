import debounce from "lodash.debounce"
import { useEffect, useMemo, useRef, useState } from "react"
import { useDispatch, useSelector } from "react-redux"
import { getGists, searchGistsByUserName } from "../store/gists"

export function Gist() {
  const ref = useRef()
  const { gistsPending, gists, gistsError } = useSelector(
    (state) => state.gists,
  )

  const [search, setSearch] = useState("")

  const dispatch = useDispatch()

  const searchGistDebounced = useMemo(() => {
    return debounce((query) => {
      const isCurrentQuery = query === ref.current

      dispatch(searchGistsByUserName(query, isCurrentQuery))
    }, 300)
  }, [dispatch])

  useEffect(() => {
    if (!gists.length) {
      dispatch(getGists())
    }
  }, [dispatch, gists])

  useEffect(() => {
    if (search) {
      searchGistDebounced(search, dispatch)
    }

    ref.current = search
  }, [search, dispatch, searchGistDebounced])

  if (gistsError) {
    return <h1>oooppss...</h1>
  }

  return (
    <div>
      {/* <button onClick={getGists}>get</button> */}
      {Array.from({ length: 10 }).map((_, index) => (
        <button key={index} onClick={() => dispatch(getGists(index + 1))}>
          button {index}
        </button>
      ))}
      <hr />
      <h1>Search</h1>
      <input value={search} onChange={(e) => setSearch(e.target.value)} />
      <hr />

      {gistsPending ? (
        <h1>pending...</h1>
      ) : (
        <ul>
          {gists.map((gist, index) => (
            <li key={index}>{gist.description}</li>
          ))}
        </ul>
      )}
    </div>
  )
}
