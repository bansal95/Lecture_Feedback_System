//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Lesser General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
// 
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Lesser General Public License for more details.
// 
// You should have received a copy of the GNU Lesser General Public License
// along with this program.  If not, see http://www.gnu.org/licenses/.
// 

#ifndef __LAB2_DLAYER_H_
#define __LAB2_DLAYER_H_

#include <omnetpp.h>
#include <A_PDU_m.h>
#include <D_PDU_m.h>
using namespace omnetpp;

/**
 * TODO - Generated class
 */
class Dlayer : public cSimpleModule
{
  protected:
    int id;
    cGate* down_in;
    cGate* up_in;
    cGate* down_out;
    cGate* up_out;
    cMessage* timeoutEvent;
    int sent;
    int received;


    virtual void initialize();
    virtual void handleMessage(cMessage *msg);
    virtual void refreshDisplay() const override;
};

#endif