Auburnite Contracts
=================

A set of abstractions extracted out of the Auburnite components.


Design Principles
-----------------

* contracts are split by domain, each into their own sub-namespaces;
* contracts are small and consistent sets of PHP interfaces, traits, normative
  docblocks and reference test suites when applicable;
* all contracts must have a proven implementation to enter this repository;
* they must be backward compatible with existing Auburnite components.

Packages that implement specific contracts should list them in the "provide"
section of their "composer.json" file, using the `auburnite/*-implementation`
convention (e.g. `"provide": { "auburnite/exception-implementation": "1.0" }`).

FAQ
---

### How to use this package?

The abstractions in this package are useful to achieve loose coupling and
interoperability. By using the provided interfaces as type hints, you are able
to reuse any implementations that match their contracts. It could be an Auburnite
component, or another one provided by the PHP community at large.

Depending on their semantics, some interfaces can be combined with autowiring to
seamlessly inject a service in your classes.

Others might be useful as labeling interfaces, to hint about a specific behavior
that could be enabled when using autoconfiguration or manual service tagging (or
any other means provided by your framework.)

### How is this different from PHP-FIG's PSRs?

When applicable, the provided contracts are built on top of PHP-FIG's PSRs. But
the group has different goals and different processes. Here, we're focusing on
providing abstractions that are useful on their own while still compatible with
implementations provided by Symfony. Although not the main target, we hope that
the declared contracts will directly or indirectly contribute to the PHP-FIG.

Resources
---------

* [Report issues](https://github.com/Auburnite/Auburnite/issues) and
  [send Pull Requests](https://github.com/Auburnite/Auburnite/pulls)
  in the [main Auburnite repository](https://github.com/Auburnite/Auburnite)
