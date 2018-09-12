# Example project which uses Changeset library

This is a Symfony (3.4) project which integrates [chgst-bundle](https://github.com/chgst/chgst-bundle).

The application is very basic entry/exit system where you can register events of someone's entering any building
and after that exiting it.

In first iteration (iteration-1 branch) it can only tell you if someone is in the building and how many people are
in each building.

In second iteration (cqrs-es branch) I've added CQRS/ES and application can tell you same information at any point in the past.
Also you can get more information like what are the busiest times.
