name: 🐛 Bug Report
description: Signaler un bug dans POKÉ-MVC
title: "[BUG] "
labels: ["bug"]
assignees: []

body:
  - type: markdown
    attributes:
      value: |
        Merci de signaler ce bug ! Remplissez les détails ci-dessous pour nous aider à le corriger rapidement.

  - type: textarea
    id: description
    attributes:
      label: Description du Bug
      description: Description claire et concise du problème
      placeholder: "Le tournoi plante quand..."
    validations:
      required: true

  - type: textarea
    id: steps
    attributes:
      label: Étapes pour Reproduire
      description: Comment reproduire le bug ?
      placeholder: |
        1. Aller sur...
        2. Cliquer sur...
        3. Observer...
    validations:
      required: true

  - type: textarea
    id: expected
    attributes:
      label: Comportement Attendu
      description: Que devrait-il se passer ?
      placeholder: "Le tournoi devrait afficher les résultats..."
    validations:
      required: true

  - type: textarea
    id: actual
    attributes:
      label: Comportement Actuel
      description: Que se passe-t-il réellement ?
      placeholder: "Le site affiche une erreur 500..."
    validations:
      required: true

  - type: textarea
    id: error
    attributes:
      label: Erreur ou Log
      description: Copier/coller les messages d'erreur
      render: bash

  - type: dropdown
    id: php_version
    attributes:
      label: Version PHP
      options:
        - "8.0"
        - "8.1"
        - "8.2"
        - "8.3"
        - "Autre (préciser ci-dessous)"
    validations:
      required: true

  - type: dropdown
    id: browser
    attributes:
      label: Navigateur
      options:
        - "Chrome"
        - "Firefox"
        - "Safari"
        - "Edge"
        - "Autre"
    validations:
      required: true

  - type: input
    id: os
    attributes:
      label: Système d'Exploitation
      placeholder: "Windows 10, macOS, Ubuntu..."
    validations:
      required: true

  - type: textarea
    id: screenshots
    attributes:
      label: Screenshots (optionnel)
      description: "Ajouter des screenshots si pertinent (Drag & drop)"

  - type: textarea
    id: additional
    attributes:
      label: Informations Supplémentaires
      description: "Tout ce qui pourrait aider..."
