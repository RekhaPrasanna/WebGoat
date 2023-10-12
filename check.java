rules:
  - id: do-privileged-use
    severity: WARNING
    languages:
      - java
    metadata:
      cwe:
        - "CWE-269: Improper Privilege Management"
      references:
        - https://docs.oracle.com/javase/8/docs/technotes/guides/security/doprivileged.html
        - https://wiki.sei.cmu.edu/confluence/display/java/Privilege+Escalation
        - http://phrack.org/papers/escaping_the_java_sandbox.html
      category: security
      technology:
        - java
      owasp:
        - A04:2021 - Insecure Design
      subcategory:
        - audit
      likelihood: LOW
      impact: MEDIUM
      confidence: LOW
      license: Commons Clause License Condition v1.0[LGPL-2.1-only]
      vulnerability_class:
        - Improper Authorization
    message: Marking code as privileged enables a piece of trusted code to
      temporarily enable access to more resources than are available directly to
      the code that called it. Be very careful in your use of the privileged
      construct, and always remember to make the privileged code section as
      small as possible.
    patterns:
      - pattern-inside: |
          import java.security.*;
          ...
      - pattern-either:
          - pattern: AccessController.doPrivileged(...);
          - pattern: class $ACTION implements PrivilegedAction<Void> { ... }
