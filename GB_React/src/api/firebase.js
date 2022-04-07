import firebase from "firebase"

const firebaseConfig = {
  apiKey: "AIzaSyAzwFHou5BVa6-zMfC8HcQX_0xy4tSMJSY",
  authDomain: "gb-chat-8e50a.firebaseapp.com",
  databaseURL:
    "https://gb-chat-8e50a-default-rtdb.europe-west1.firebasedatabase.app",
  projectId: "gb-chat-8e50a",
  storageBucket: "gb-chat-8e50a.appspot.com",
  messagingSenderId: "857460809208",
  appId: "1:857460809208:web:5c6a7cacd190df43c7ca0d",
  measurementId: "G-PQD9204QNF",
}

export const firebaseApp = firebase.initializeApp(firebaseConfig)

export const db = firebaseApp.database()
