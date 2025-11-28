name: 💡 Feature Request
description: Suggérer une nouvelle fonctionnalité
title: "[FEATURE] "
labels: ["enhancement"]
assignees: []

body:
  - type: markdown
    attributes:
      value: |
        Merci de suggérer une amélioration ! Décrivez votre idée ci-dessous.

  - type: textarea
    id: description
    attributes:
      label: Description
      description: Description claire de la fonctionnalité demandée
      placeholder: "Je voudrais ajouter..."
    validations:
      required: true

  - type: textarea
    id: motivation
    attributes:
      label: Motivation
      description: Pourquoi cette fonctionnalité serait utile ?
      placeholder: "Cela améliorerait... parce que..."
    validations:
      required: true

  - type: textarea
    id: implementation
    attributes:
      label: Implémentation Suggérée
      description: "Comment pensez-vous que ça devrait marcher ?"
      placeholder: |
        L'utilisateur pourrait :
        1. Cliquer sur...
        2. Remplir...
        3. Voir...

  - type: textarea
    id: alternatives
    attributes:
      label: Alternatives Considérées
      description: "Autres approches possibles ?"
      placeholder: |
        - Option A : ...
        - Option B : ...

  - type: checkboxes
    id: priority
    attributes:
      label: Priorité
      description: "Quelle est l'urgence ?"
      options:
        - label: "🔥 Haute (Améliore beaucoup l'UX)"
        - label: "🟡 Moyenne (Amélioration sympa)"
        - label: "🟢 Basse (Nice to have)"

  - type: textarea
    id: additional
    attributes:
      label: Contexte Supplémentaire
      description: "Screenshots, mockups, etc."
