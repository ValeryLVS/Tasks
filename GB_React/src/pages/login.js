import { Link } from "react-router-dom"
import { firebaseApp } from "../api/firebase"
import { LoginForm, AuthTemplate } from "../components"

const onSubmit = (email, password) => {
  return firebaseApp.auth().signInWithEmailAndPassword(email, password)
}

export function Login() {
  return (
    <AuthTemplate
      link={<Link to="sign-up">У вас нет аккаунта? Зарегистрируйтесь</Link>}
    >
      <LoginForm title="Авторизация" submitButton="Войти" onSubmit={onSubmit} />
    </AuthTemplate>
  )
}
