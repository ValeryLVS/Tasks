module.exports = {
  env: {
    browser: true,
    node: true,
  },
  settings: {
    react: {
      version: "detect",
    },
  },
  parserOptions: {
    sourceType: "module",
  },
  parser: "babel-eslint",
  plugins: ["react", "react-hooks", "import", "prettier"],
  extends: ["eslint:recommended", "plugin:react/recommended", "prettier"],
  rules: {
    // отрлючить по желанию
    "react/prop-types": "off",
    "react/react-in-jsx-scope": "off",
    "no-unused-vars": "off",
    "no-undef": "off",
    // ESLINT RULES
    // https://eslint.org/docs/rules/
    "no-useless-catch": "warn",
    "no-prototype-builtins": "off",
    "guard-for-in": "error",
    "id-match": "error",
    "max-classes-per-file": ["error", 1],
    "no-bitwise": "error",
    "no-caller": "error",
    "no-duplicate-imports": "error",
    "no-eval": "error",
    "no-irregular-whitespace": "off",
    "no-fallthrough": "error",
    "no-new-wrappers": "error",
    "no-throw-literal": "error",
    "no-undef-init": "error",
    "no-var": "error",
    "object-shorthand": "error",
    "prefer-const": "error",
    radix: "error",

    // ESLINT-PLUGIN-IMPORT
    // https://github.com/benmosher/eslint-plugin-import/tree/master/docs/rules
    "import/no-unresolved": "off",
    "import/no-default-export": "error",
    "import/order": [
      "error",
      {
        alphabetize: {
          order: "asc",
          caseInsensitive: true,
        },
        groups: [
          "builtin",
          "external",
          "internal",
          "parent",
          ["sibling", "index"],
          "unknown",
        ],
      },
    ],

    // ESLINT-PLUGIN-REACT
    // https://github.com/yannickcr/eslint-plugin-react/tree/master/docs/rules
    "react/display-name": "off",
    "react/jsx-boolean-value": ["error", "always"],
    "react/no-unescaped-entities": [
      "error",
      {
        forbid: [
          {
            char: '"',
            alternatives: ["&quot;"],
          },
          {
            char: ">",
            alternatives: ["&gt;"],
          },
          {
            char: "'",
            alternatives: ["&apos;"],
          },
          {
            char: "}",
            alternatives: ["&#125;"],
          },
          {
            char: "{",
            alternatives: ["&#123;"],
          },
        ],
      },
    ],
    "react/self-closing-comp": "error",
    // REACT-HOOKS
    // https://github.com/facebook/react/tree/master/packages/eslint-plugin-react-hooks
    "react-hooks/rules-of-hooks": "warn",
    "react-hooks/exhaustive-deps": "warn",
  },
}
