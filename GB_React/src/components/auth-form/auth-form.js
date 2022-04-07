import { Input, makeStyles, Button } from "@material-ui/core"
import { useState } from "react"

export function LoginForm({ title, submitButton, onSubmit }) {
  const styles = useStyles()
  const [email, setEmail] = useState("")
  const [password, setPassword] = useState("")
  const [error, setError] = useState("")

  const handleSubmit = async () => {
    try {
      await onSubmit(email, password)
    } catch (e) {
      setError(e.message)
    }
  }

  return (
    <div className={styles.root}>
      <h1>{title}</h1>
      <Input
        value={email}
        onChange={(e) => setEmail(e.target.value)}
        fullWidth={true}
        placeholder="Email"
        className={styles.input}
      />
      <Input
        value={password}
        onChange={(e) => setPassword(e.target.value)}
        fullWidth={true}
        placeholder="Password"
        type="password"
        className={styles.input}
      />

      <Button variant="text" onClick={handleSubmit} fullWidth={true}>
        {submitButton}
      </Button>
    </div>
  )
}

const useStyles = makeStyles(() => {
  return {
    input: {
      color: "#9a9fa1",
      padding: "10px 15px",
      fontSize: "15px",
      marginBottom: 15,
    },
    root: {
      "& h1": {
        fontSize: 25,
        fontWeight: "bold",
        marginBottom: 50,
      },
    },
  }
})
